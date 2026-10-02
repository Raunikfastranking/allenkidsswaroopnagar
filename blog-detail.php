<?php
$page = "blog-detail";
require_once "proxy/api.php";
require_once "proxy/apis.php";

$slug = $_GET['slug'] ?? null;
$blogData = fetchApiData("api/blogs/branch/4");
$selectedBlog = null;
$blogDate = null;

if (!empty($slug) && !empty($blogData['data'])) {
    foreach ($blogData['data'] as $blog) {
        if ($blog['slug'] === $slug) {
            $selectedBlog = $blog;
            $blogDate = $blog['date'] ?? null;
            break;
        }
    }
}

// Redirect legacy blog URLs and handle missing content
if (!empty($slug) && !empty($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'blog-detail') !== false) {
    header('Location: /blog/' . rawurlencode($slug), true, 301);
    exit;
}

if (!$selectedBlog) {
    http_response_code(404);
    include '404.php';
    exit;
}

$canonicalUrl = '/blog/' . $selectedBlog['slug'];
$blogTitle = htmlspecialchars($selectedBlog['blogdetails'][0]['title'] ?? $selectedBlog['title'] ?? 'Blog Detail');

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $selectedBlog ? htmlspecialchars($selectedBlog['meta_title']) : 'Blog Detail' ?> | Allen Kids SwaroopNagar</title>
    <meta name="description" content="<?= $selectedBlog ? htmlspecialchars($selectedBlog['meta_description']) : 'Blog Detail' ?>">
    <meta name="keywords" content="">
    <script type="application/ld+json">
<?php
$schema = [
  "@context" => "https://schema.org",
  "@type" => "BreadcrumbList",
  "itemListElement" => [
    [
      "@type" => "ListItem",
      "position" => 1,
      "name" => "Home",
      "item" => "https://allenkidsswaroopnagar.in/"
    ],
    [
      "@type" => "ListItem",
      "position" => 2,
      "name" => "Blog",
      "item" => "https://allenkidsswaroopnagar.in/blogs"
    ],
    [
      "@type" => "ListItem",
      "position" => 3,
      "name" => $blogTitle,
      "item" => "https://allenkidsswaroopnagar.in/blog/".$slug
    ]
  ]
];

echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>

    <?php include "includes/head.php" ?>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>
    <!-- End -->

    <main>
        <!--==== Breadcrumb ====-->
        <section class="about-brudcrumb md:h-[350px] h-[200px] bg-cover">
            <div class="text-center md:pt-30 pt-12">
                <h1 class="text-[42px] font-[400] text-white"><?= $selectedBlog ? htmlspecialchars($selectedBlog['blogdetails'][0]['title']) : 'Blog Detail' ?> </h1>
                <ul class="flex items-center gap-3 justify-center">
                    <li><a href="/" class="text-white">Home</a></li>
                    <li>›</li>
                    <li><a href="/blogs" class="text-white">Blogs</a></li>
                    <li>›</li>
                    <li><span class="text-[#FAB319]"><?= $selectedBlog ? htmlspecialchars($selectedBlog['blogdetails'][0]['title']) : 'Blog Detail' ?></span></li>
                </ul>
            </div>
        </section>
        <!--==== End ====-->

        <section class="mt-10 mb-10">
            <div class="comman-container-1280">
                <div class="md:flex gap-10 mt-5">
                    <div class="md:w-[100%]">
                        <div class="text-[#172B4D] text-[15px] tracking-[2px] mb-2">
                            CATEGORY: <?php
                                        $total = count($selectedBlog['categories']);
                                        foreach ($selectedBlog['categories'] as $index => $category):
                                        ?>
                                <strong class="capatilize"><?php echo htmlspecialchars($category['name']); ?><?php if ($index < $total - 1) echo ' ,'; ?></strong>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-[#172B4D] text-[15px] mb-1">Published on <strong> <?= date("d F Y", strtotime($selectedBlog['date'])) ?></strong></div>
                        <div class="text-[#172B4D] text-[15px] mb-1">Tags:
                            <?php
                            $total = count($selectedBlog['tag']);
                            foreach ($selectedBlog['tag'] as $index => $tag): ?>
                                <strong><?php echo htmlspecialchars($tag['name']); ?><?php if ($index < $total - 1) echo ' ,'; ?></strong>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($selectedBlog && !empty($selectedBlog['blogdetails'])) { ?>
                            <div>
                                <?php foreach ($selectedBlog['blogdetails'] as $detail) { ?>
                                    <div class="mb-10">
                                        <?php
                                            $imageUrl = !empty($detail['image_url'])
                                                ? rtrim(API_BASE_URL, '/') . '/' . ltrim($detail['image_url'], '/')
                                                : (!empty($selectedBlog['image_url'])
                                                    ? rtrim(API_BASE_URL, '/') . '/' . ltrim($selectedBlog['image_url'], '/')
                                                    : "https://dummyimage.com/800x400/e6e6ed/000000&text=Not+Provided");
                                        ?>
                                        <img src="<?= htmlspecialchars($imageUrl) ?>"
                                            class="w-[100%] mb-4"
                                            alt="<?= htmlspecialchars($detail['image_alt_text'] ?? $selectedBlog['image_alt_text'] ?? $selectedBlog['image_alt'] ?? 'Blog Image') ?>" onerror="
                                                    if (!this.dataset.fallback) {
                                                        this.dataset.fallback = true;
                                                        this.src = 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png';
                                                    } else {
                                                        this.style.height = '10%';
                                                        this.style.objectFit = 'cover';
                                                    }
                                                ">

                                        <div class="mt-3">
                                            <div class="flex gap-5 items-center">
                                                <span class="text-[#A32CFF] flex items-center gap-1">
                                                    <?= $selectedBlog['date'] ? date("M d, Y", strtotime($selectedBlog['date'])) : '' ?>
                                                </span>
                                            </div>

                                            <h2 class="text-[#2B3C6B] text-[32px] md:leading-10 mt-3">
                                                <?= htmlspecialchars($detail['title'] ?? 'Untitled Blog') ?>
                                            </h2>

                                            <p class="w-[90%] text-[#70747F] text-[20px] mt-2">
                                                <?= $detail['description'] ?? 'No description available.' ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p class="text-red-600 text-lg">No blog details found for this slug.</p>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </section>

        <?php include "includes/legacy.php" ?>
        <?php include "includes/footer.php" ?>
    </main>
    <?php include "includes/foot.php" ?>
</body>

</html>