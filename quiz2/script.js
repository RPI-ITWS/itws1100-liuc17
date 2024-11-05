$(document).ready(function () {
    $('#submitButton').on('click', function () {
        $.getJSON('names.json', function (data) {
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
