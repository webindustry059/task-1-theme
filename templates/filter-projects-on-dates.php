
        <!-- Search Form -->
        <form action="#" id="filter-form">
            <div class="row mt-2 mb-2 search_project_main_div justify-content-center">
                <div class="col-md-3 col-10">
                    <div class="form-group">
                        <label for="start_date"><?php echo esc_html__('Date (start)', 'task-1-theme'); ?></label>
                        <input type="date" class="form-control" name="start_date" id="start_date">
                    </div>
                </div>
                <div class="col-md-3 col-10">
                    <div class="form-group">
                        <label for="end_date"><?php echo esc_html__('Date (end)', 'task-1-theme'); ?></label>
                        <input type="date" class="form-control" name="end_date" id="end_date">
                    </div>
                </div>
                <div class="col-md-2 col-10 search_project_div">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary search_projects"><?php echo esc_html__('Search', 'task-1-theme'); ?></button>
                    </div>
                </div>
            </div>
        </form>