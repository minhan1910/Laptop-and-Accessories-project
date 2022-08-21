const permissionSelect = document.querySelector(".select_permission");
const actionsSelectChoose = document.querySelector(".actions_select_choose");

function checkPermissonInputIsSelected() {
    let permissionSelectedValue =
        permissionSelect.options[permissionSelect.selectedIndex].value;

    if (permissionSelectedValue === "0") {
        actionsSelectChoose.disabled = true;
        // $("actions_select_choose option:selected").prop("disabled", true);
    } else {
        actionsSelectChoose.disabled = false;
    }
}

// setInterval(checkPermissonInputIsSelected);
// checkPermissonInputIsSelected();

$(".actions_select_choose").select2({
    tags: true,
    tokenSeparators: [","],
});

function actionSelect(e) {
    let value = $(this).val();
    let urlRequest = $(this).data("url");
    $.ajax({
        type: "GET",
        url: urlRequest,
        dataType: "json",
        data: {
            permissionId: value,
        },
        success: function (response) {
            console.log(response);
            let html = "";
            let optionsHtml = "";
            let marked = "";
            response.data[0].forEach((permission) => {
                html += `${marked}${permission.name}`;
                optionsHtml += `<option value="${permission.id}" selected></option>`;
                marked = "/";
            });
            console.log(optionsHtml);
            renderActionNames(html, optionsHtml);
        },
    });
}

$(".select_permission").on("change", actionSelect);
const actionNames = document.querySelector(".action_names");
const actionNamesHidden = document.querySelector(".action_names_hidden");
function renderActionNames(html, optionsHtml) {
    actionNames.value = html;
    actionNamesHidden.innerHTML = optionsHtml;
}
