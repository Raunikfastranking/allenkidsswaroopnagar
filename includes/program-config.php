<?php

/**
 * Program CMS SEO slug map and URL helpers (Swaroop Nagar).
 * Public URLs use CMS slugs; legacy ?id= keys redirect to those slugs.
 */

function allenkids_program_id_slug_map(): array
{
    return [
        'toddler'      => 'best-toddler-program-near-swaroop-nagar-allen-kids',
        'playgroup-1'  => 'best-playgroup-for-toddlers-in-swaroop-nagar-allen-kids',
        'playgroup-2'  => 'allen-kids-best-playgroup-school-in-swaroop-nagar-kanpur',
        'nursery'      => 'early-childhood-nursery-program-allen-kids-swaroop-nagar',
        'preparatory'  => 'preparatory-school-program-in-swaroop-nagar-allen-kids',
    ];
}

function allenkids_program_slug_for_id(?string $id): ?string
{
    if ($id === null || $id === '') {
        return null;
    }
    $map = allenkids_program_id_slug_map();
    return $map[$id] ?? null;
}

function allenkids_program_legacy_id_for_slug(?string $slug): ?string
{
    if ($slug === null || $slug === '') {
        return null;
    }
    $flip = array_flip(allenkids_program_id_slug_map());
    return $flip[$slug] ?? null;
}

function allenkids_is_program_slug(?string $slug): bool
{
    if ($slug === null || $slug === '') {
        return false;
    }
    return in_array($slug, array_values(allenkids_program_id_slug_map()), true);
}

function allenkids_program_public_path(string $slug): string
{
    $id = allenkids_program_legacy_id_for_slug($slug);
    if ($id !== null) {
        return '/programs/' . $id;
    }
    return '/' . ltrim($slug, '/');
}

function allenkids_program_canonical_url(string $slug): string
{
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? null) == 443);
    $scheme = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'allenkidsswaroopnagar.in';
    return $scheme . '://' . $host . allenkids_program_public_path($slug);
}

function allenkids_redirect_legacy_program_id(): void
{
    $id = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
    if ($id === '') {
        return;
    }
    $slug = allenkids_program_slug_for_id($id);
    if ($slug === null) {
        return;
    }

    $requestPath = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if ($requestPath === 'programs/' . $id) {
        return;
    }

    header('Location: /programs/' . $id, true, 301);
    exit;
}

function allenkids_resolve_program_slug(): ?string
{
    $slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
    if ($slug !== '' && allenkids_is_program_slug($slug)) {
        return $slug;
    }
    $id = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
    return allenkids_program_slug_for_id($id);
}

function allenkids_normalize_menu_program_url(string $url): string
{
    if (preg_match('/program-single(?:\.php)?\?(?:[^#]*&)?id=([^&]+)/i', $url, $m)) {
        $slug = allenkids_program_slug_for_id(rawurldecode($m[1]));
        if ($slug !== null) {
            return allenkids_program_public_path($slug);
        }
    }
    return $url;
}

function allenkids_all_program_slugs(): array
{
    return array_values(allenkids_program_id_slug_map());
}
