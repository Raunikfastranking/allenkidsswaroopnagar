<?php
function renderDynamicSections($pagesData, $api_url, $startIndex = 0)
{
    if (empty($pagesData['data']['sections'])) return;

    foreach (array_slice($pagesData['data']['sections'], $startIndex) as $data) {
        $layoutId = $data['section_layout_id'] ?? null;
        $section_type = $data['section_type'] ?? null;

        switch ($layoutId) {
            case "1":
                include __DIR__ . '/layout_one.php';
                break;

            case "2":
                include __DIR__ . '/layout_two.php';
                break;

            case "3":
                include __DIR__ . '/layout_three.php';
                break;

            case "4":
                include __DIR__ . '/layout_four.php';
                break;
            case "5":
                include __DIR__ . '/layout_five.php';
                break;
            case "6":
                include __DIR__ . '/layout_six.php';
                break;
            case "7":
                include __DIR__ . '/layout_seven.php';
                break;
            case "8":
                include __DIR__ . '/layout_eight.php';
                break;
            case "9":
                include __DIR__ . '/layout_nine.php';
                break;
            case "10":
                include __DIR__ . '/layout_ten.php';
                break;

            default:
                echo "<div></div>";
                break;
        }
    }
}
