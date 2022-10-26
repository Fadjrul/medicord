
                <!-- footer Start -->
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>&copy; <?php echo $setting[0]->setting_short_appname;?> Version 1.0 <?= date('Y'); ?></p>
                        </div>
                        <div class="float-end">
                            <p>Created by <a href="https://instagram.com/fadjrul00"><?php echo $setting[0]->setting_owner_name;?></a></p>
                        </div>
                    </div>
                </footer>
                <!-- footer End -->
            <!-- main content end -->
            </div>
        <!-- layout navbar end -->
        </div>
    <!-- app end -->
    </div>
    <!-- javascript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/extensions/dayjs/dayjs.min.js"></script>
    <script src="<?php echo base_url();?>assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="<?php echo base_url();?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>

    <script type="text/javascript">
        // Data table
        let dataTable = new simpleDatatables.DataTable(document.getElementById("DataTable"));
        // Move "per page dropdown" selector element out of label
        // to make it work with bootstrap 5. Add bs5 classes.
        function adaptPageDropdown() {
        const selector = dataTable.wrapper.querySelector(".dataTable-selector");
        selector.parentNode.parentNode.insertBefore(selector, selector.parentNode);
        selector.classList.add("form-select");
        }

        // Add bs5 classes to pagination elements
        function adaptPagination() {
        const paginations = dataTable.wrapper.querySelectorAll(
            "ul.dataTable-pagination-list"
        );

        for (const pagination of paginations) {
            pagination.classList.add(...["pagination", "pagination-info"]);
        }

        const paginationLis = dataTable.wrapper.querySelectorAll(
            "ul.dataTable-pagination-list li"
        );

        for (const paginationLi of paginationLis) {
            paginationLi.classList.add("page-item");
        }

        const paginationLinks = dataTable.wrapper.querySelectorAll(
            "ul.dataTable-pagination-list li a"
        );

        for (const paginationLink of paginationLinks) {
            paginationLink.classList.add("page-link");
        }
        }

        // Patch "per page dropdown" and pagination after table rendered
        dataTable.on("datatable.init", function () {
            adaptPageDropdown();
            adaptPagination();
        });

        // Re-patch pagination after the page was changed
        dataTable.on("datatable.page", adaptPagination);

    </script>
</body>

</html>