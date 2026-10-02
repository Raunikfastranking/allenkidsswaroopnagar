<?php
require_once __DIR__ . '/allen-site-root.php';
?>
<script>
window.ALLEN_SITE_ROOT = <?= json_encode($AllenSiteRoot, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
window.allenProxyUrl = function (name) {
    var root = window.ALLEN_SITE_ROOT || '';
    var proxy = String(name || '').replace(/^\/?proxy\//, '').replace(/\.php$/, '');
    return (root ? root + '/' : '') + 'proxy/' + proxy;
};
</script>
