<?php
$page_js_files = ['config', 'api', 'global'];
if (!empty($page_js)) {
    $page_js_files = array_merge($page_js_files, is_array($page_js) ? $page_js : [$page_js]);
}
$page_js_files = array_values(array_unique($page_js_files));
?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php foreach ($page_js_files as $js_file): ?>
    <script src="assets/js/<?php echo htmlspecialchars($js_file, ENT_QUOTES, 'UTF-8'); ?>.js"></script>
<?php endforeach; ?>
</body>
</html>
