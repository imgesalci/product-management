$(document).ready(function () {
    $(".edit").click(function () {
      var row = $(this).closest("tr");
      var isEditing = row.hasClass("editing");
  
      if (!isEditing) {
        // Switch table cells to input fields
        row.addClass("editing").find(".editable").each(function () {
          var column = $(this).data("column");
          var value = $(this).text().trim();
          $(this).data("prev-value", value);
          $(this).empty().append($('<input>').attr('type', 'text').attr('name', column).val(value));

        });
      } else {
        // Get the ID of the row
        var id = $(this).data("id");
        var dataToUpdate = {};
  
        row.find(".editable input").each(function () {
          var column = $(this).attr("name");
          var value = $(this).val().trim();
          dataToUpdate[column] = value;
        });

        $.ajax({
          url: "./updating.php",
          method: "POST",
          data: {
            update: true,
            id: id,
            ...dataToUpdate,
          },
          success: function (response) {
            alert(response);
            row.removeClass("editing").find(".editable").each(function () {
              var prevValue = $(this).data("prev-value");
              var column = $(this).data("column");
              $(this).text(dataToUpdate[column] || prevValue);
            });
          },
          error: function () {
            console.log("error occurred.");
          },
        });
      }
    });
  });
  