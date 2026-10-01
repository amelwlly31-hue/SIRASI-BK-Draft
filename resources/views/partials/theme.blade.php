<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
<script>
    (function () {
        var theme = localStorage.getItem('sirasi-theme') || 'light';
        if (theme === 'dark') {
            document.documentElement.classList.add('dark-mode');
        } else {
            document.documentElement.classList.remove('dark-mode');
        }

        var responsive = localStorage.getItem('sirasi-responsive');
        if (responsive === 'false') {
            document.documentElement.classList.add('responsive-disabled');
        } else {
            document.documentElement.classList.remove('responsive-disabled');
        }

        document.addEventListener('DOMContentLoaded', function () {
            var currentTheme = localStorage.getItem('sirasi-theme') || 'light';
            document.body.classList.toggle('dark-mode', currentTheme === 'dark');
            document.documentElement.classList.toggle('dark-mode', currentTheme === 'dark');

            var currentResponsive = localStorage.getItem('sirasi-responsive') !== 'false';
            document.body.classList.toggle('responsive-disabled', !currentResponsive);
            document.documentElement.classList.toggle('responsive-disabled', !currentResponsive);
        });
    })();
</script>

@if (config('app.demo_mode', false))
<script>
    (function () {
        // Biarkan halaman login berfungsi normal sepenuhnya
        if (window.location.pathname.includes('/login') || window.location.pathname.endsWith('/login')) {
            return;
        }

        window.confirm = function () { return false; };
        window.alert = function () {};
        window.prompt = function () { return null; };

        window.openCreateModal = function () {};
        window.closeCreateModal = function () {};
        window.openImportModal = function () {};
        window.closeImportModal = function () {};
        window.openModal = function () {};
        window.closeModal = function () {};
        window.toggleFilter = function () {};
        window.confirmDelete = function () { return false; };

        function isAllowedNavigation(link) {
            if (!link || !link.href) return false;

            var href = link.getAttribute('href') || '';
            if (href === '#' || href.startsWith('javascript:') || href === '') {
                return false;
            }

            if (
                href.includes('/create') ||
                href.includes('/edit') ||
                href.includes('/toggle-status') ||
                href.includes('/import')
            ) {
                return false;
            }

            if (
                link.closest('.sidebar') ||
                link.closest('.menu') ||
                link.closest('.sirasi-sidebar') ||
                link.classList.contains('menu-item') ||
                link.classList.contains('report-type') ||
                link.classList.contains('back-link') ||
                link.classList.contains('back') ||
                link.classList.contains('action-button') ||
                href.includes('/dashboard') ||
                href.includes('/siswa') ||
                href.includes('/riwayat-siswa') ||
                href.includes('/konseling') ||
                href.includes('/penjadwalan') ||
                href.includes('/laporan') ||
                href.includes('/pengaturan') ||
                href.includes('/login')
            ) {
                return true;
            }

            return false;
        }

        document.addEventListener('click', function (e) {
            var target = e.target;

            if (target.closest('.login-card') || target.closest('.login-page') || target.closest('form[action*="login"]')) {
                return;
            }

            var link = target.closest('a');
            if (link) {
                if (isAllowedNavigation(link)) {
                    return;
                }
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }

            if (target.closest('.notification') || target.closest('#notificationButton') || target.closest('.bell')) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }

            if (
                target.closest('.theme-choice') ||
                target.closest('.responsive-choice') ||
                target.closest('.option-card') ||
                target.closest('#preferenceCard') ||
                target.closest('#infoCard')
            ) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }

            var btn = target.closest('button');
            if (btn) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }

            if (
                target.closest('.filter-button') ||
                target.closest('.filter-actions') ||
                target.closest('.btn-session') ||
                target.closest('.btn-sp') ||
                target.closest('.btn-edit') ||
                target.closest('.history-action') ||
                target.closest('.show-button') ||
                target.closest('.modal-close')
            ) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }
        }, true);

        document.addEventListener('submit', function (e) {
            if (e.target && (e.target.closest('.login-page') || e.target.closest('.login-card') || (e.target.action && e.target.action.includes('login')))) {
                return;
            }
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            return false;
        }, true);

        document.addEventListener('keydown', function (e) {
            if (e.target && (e.target.closest('.login-page') || e.target.closest('.login-card') || e.target.closest('form[action*="login"]'))) {
                return;
            }
            if (e.key === 'Enter') {
                var tag = e.target.tagName ? e.target.tagName.toLowerCase() : '';
                if (tag === 'input' || tag === 'select') {
                    e.preventDefault();
                    e.stopPropagation();
                    return false;
                }
            }
        }, true);

        document.addEventListener('DOMContentLoaded', function () {
            var notifDropdown = document.getElementById('notificationDropdown');
            if (notifDropdown) {
                notifDropdown.classList.remove('show');
                notifDropdown.style.display = 'none';
            }
        });
    })();
</script>
@endif
