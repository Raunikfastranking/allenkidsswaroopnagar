<?php
// ExtraaEdge form widget loader — emits once per page.
// Initializes one eeFormWidget per registered container id (window.__eeFormIds).
if (empty($GLOBALS['__eeWidgetLoaderDone'])):
    $GLOBALS['__eeWidgetLoaderDone'] = true;
?>
<script>
    window.addEventListener("DOMContentLoaded", function () {
        var eeIds = window.__eeFormIds || [];
        if (!eeIds.length) return;
        window.ee_form_widget_baseurl = "https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/ee-form-widget/";
        if (!document.getElementById("__formWidgetCss")) {
            var e = document.createElement("link");
            e.id = "__formWidgetCss";
            e.rel = "stylesheet";
            e.href = window.ee_form_widget_baseurl + "css/stylesheet.min.css";
            e.type = "text/css";
            document.getElementsByTagName("head")[0].appendChild(e);
        }
        var t = document.createElement("script");
        t.type = "text/javascript";
        t.onload = async function () {
            for (var i = 0; i < eeIds.length; i++) {
                try {
                    var w = new eeFormWidget();
                    await w.init("superhouseeducation", "form-11", eeIds[i]);
                } catch (err) {
                    console.error("eeFormWidget init failed for #" + eeIds[i], err);
                }
            }
        };
        t.src = window.ee_form_widget_baseurl + "js/eeFormWidget.min.js";
        document.getElementsByTagName("head")[0].appendChild(t);
    });
</script>
<?php endif; ?>
