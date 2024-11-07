// Wait for the document to be fully loaded before executing the script
$(document).ready(function() {
    $.ajax({
        url: '../lab08/projects.json', 
        dataType: 'json', 
        success: function(data) {

            // Find the container where the projects will be appended
            let projectContainer = $('.flex-container');
            projectContainer.empty();

            // Iterate over each lab in the projectMenu array in the JSON file
            data.projectMenu.forEach(lab => {
                // Create a new div for each lab with a clickable header
                let labDiv = $('<div>').addClass('flex-item');
                let labHeader = $('<div>').addClass('project-header').text(lab.labNumber).css({
                    'cursor': 'pointer',
                    'padding': '10px',
                    'background-color': '#f5f5dc',
                    'border': '2px solid orange',
                    'border-radius': '5px',
                    'margin-bottom': '5px',
                    'font-weight': 'bold'
                });

                // Create a hidden div to hold the project details
                let projectDetails = $('<div>').addClass('project-details').hide();

                // Iterate over each project within the current lab and add it to projectDetails
                lab.projects.forEach(project => {
                    let projectLink = $('<p>').append(
                        $('<a>').attr('href', project.resourceLink).text(project.labTitle).css({
                            'color': '#007acc',
                            'text-decoration': 'none',
                            'display': 'block',
                            'margin-left': '15px',
                            'padding': '5px'
                        }).hover(
                            function() {
                                $(this).css('background-color', '#e0f7fa');
                            },
                            function() {
                                $(this).css('background-color', 'transparent');
                            }
                        )
                    );
                    projectDetails.append(projectLink);
                });

                // Append the header and details to the lab div
                labDiv.append(labHeader);
                labDiv.append(projectDetails);

                // Append the entire lab div to the main project container
                projectContainer.append(labDiv);

                // Add click functionality to toggle the visibility of project details
                labHeader.click(function() {
                    projectDetails.slideToggle();
                });
            });
        },
        error: function() { // Check if JSON file fails to load
            alert('Error loading the JSON file');
            console.error('Error loading the JSON file');
        }
    });
});
