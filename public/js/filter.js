
// Waits for the document to be fully loaded
$(document).ready(function() {
    // Attach an event listener to the status filter dropdown
    $("#statusFilter").on("change", function() {
        // Get the selected status from the dropdown
        const selectedStatus = $(this).val();

        // Iterate through each row in the table body
        $(".custom-table tbody tr").each(function() {
            // Find the status cell within the current row
            const statusCell = $(this).find(".status-cell").text();

            // Check if the selected status is "all" or matches the status of the current row
            if (selectedStatus === "all" || statusCell === selectedStatus) {
                // Show the row if the conditions are met
                $(this).show();
            } else {
                // Hide the row if the conditions are not met
                $(this).hide();
            }
        });
    });
});

