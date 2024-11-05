$(document).ready(function () {
    // Load the JSON data and display it when the submit button is clicked
    $('#submitButton').on('click', function () {
        $.getJSON('names.json', function (data) {
            // Create an ordered list to display names
            let nameList = '<ol>';
            data.names.forEach(function (name) {
                nameList += `<li class="name-item">${name}</li>`;
            });
            nameList += '</ol>';

            // Insert the ordered list into the #nameList div
            $('#nameList').html(nameList);

            // Bind a click event to each list item to display an alert with the clicked name
            $('.name-item').on('click', function () {
                alert($(this).text());
            });
        });
    });
});
