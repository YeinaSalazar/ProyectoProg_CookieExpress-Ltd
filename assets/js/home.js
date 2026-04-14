(function () {
    function drawHeroCanvas() {
        var canvas = document.getElementById('heroOrbits');
        if (!canvas) {
            return;
        }

        var ctx = canvas.getContext('2d');
        var width = canvas.width;
        var height = canvas.height;
        var centerX = width / 2;
        var centerY = height / 2;
        var rings = [70, 120, 170];

        ctx.clearRect(0, 0, width, height);
        ctx.strokeStyle = 'rgba(255,255,255,0.12)';
        ctx.lineWidth = 1;

        rings.forEach(function (radius, index) {
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
            ctx.stroke();

            var angle = (Date.now() / 1200 + index) % (Math.PI * 2);
            var x = centerX + Math.cos(angle) * radius;
            var y = centerY + Math.sin(angle) * radius;
            ctx.fillStyle = index === 1 ? '#ff7a1a' : '#7eb2ff';
            ctx.beginPath();
            ctx.arc(x, y, 7, 0, Math.PI * 2);
            ctx.fill();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('heroOrbits')) {
            drawHeroCanvas();
            window.setInterval(drawHeroCanvas, 1200);
        }
    });
})();
