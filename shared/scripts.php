<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="assets/js/global.js"></script>
    
    <?php if(isset($page_js)): ?>
        <script src="assets/js/<?php echo $page_js; ?>.js"></script>
    <?php endif; ?>
</body>
</html>