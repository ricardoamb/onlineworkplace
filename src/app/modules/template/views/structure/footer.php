    <!-- Javascript Files -->
{footerinc}
    <!-- END OF Javascript Files -->
    <!-- PNotify -->
    <script>
        $(document).ready(function() {
            new PNotify({
                title: "PNotify",
                type: "info",
                text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
                nonblock: {
                    nonblock: true
                },
                addclass: 'dark',
                styling: 'bootstrap3',
                hide: false,
                before_close: function(PNotify) {
                    PNotify.update({
                        title: PNotify.options.title + " - Enjoy your Stay",
                        before_close: null
                    });

                    PNotify.queueRemove();

                    return false;
                }
            });

        });
    </script>
    <!-- /PNotify -->
    </body>
</html>