jQuery(document).ready(function ($) {

    $('.dropdown-submenu').on('mouseenter', function () {
        var $submenu = $(this).children('.dropdown-menu');
        if ($submenu.length) {
            $submenu.addClass('show');
        }
    });

    $('.dropdown-submenu').on('mouseleave', function () {
        var $submenu = $(this).children('.dropdown-menu');
        if ($submenu.length) {
            $submenu.removeClass('show');
        }
    });


    $(document).on('click', '.search_projects', function () {
        // Get the start and end dates from the form
        var start_date = $('input[name="start_date"]').val();
        var end_date = $('input[name="end_date"]').val();

        if (!start_date || !end_date) {
            alert('Please select both start and end dates.');
            return;
        }

        // Perform the AJAX request
        $.ajax({
            url: search_projects_obj.ajax_url, // WordPress AJAX URL
            method: 'POST',
            data: {
                action: 'search_projects',
                start_date: start_date,
                end_date: end_date,
                nonce:search_projects_obj.nonce
            },
            beforeSend: function () {
                // You can add a loading spinner or message here
                $('.search_project_div').append('<div class="loading">Loading...</div>');
            },
            success: function (response) {
                // Remove the loading spinner
                $('.loading').remove();

                if (response.success) {
                    var projects = response.data;
                    var resultsDiv = $('.filtered_projects');
                    resultsDiv.empty();

                    if (projects.length > 0) {
                        $.each(projects, function (index, project) {
                            resultsDiv.append(
                                '<div class="col-md-3 col-6"><div class="card"><div class="card-title text-center"><h2>' + project.title + '</h2></div>' +
                                '<div class="card-body"><div class="task-dates"><strong>Date (From -To)</strong><p>' + project.start_date + ' - ' + project.end_date +
                                '</p></div><div class="task-url"><strong>URL</strong><a href="' + project.project_url + '">' + project.project_url + '</a></div>' +
                                '<a href="' + project.post_url + '" class="btn btn-info"> View Project</a></div></div></div>'
                            );
                        });
                    } else {
                        resultsDiv.append('<p>No projects found.</p>');
                    }
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function () {
                $('.loading').remove();
                alert('An error occurred. Please try again.');
            },
        });
    });
});