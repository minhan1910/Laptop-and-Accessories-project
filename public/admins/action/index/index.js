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
            let actionNamesHtml = "";
            let actionCurrentNamesHtml = "";
            let optionsHtml = "";
            let marked = "";
            
            response.data[0].forEach((permission) => {
                actionNamesHtml += `${marked}${permission.name}`;
                actionCurrentNamesHtml += `${marked}${permission.name}`;
                optionsHtml += `<option value="${permission.id}" selected></option>`;
                marked = "/";
            });

            renderActionNames(
                actionCurrentNamesHtml,
                actionNamesHtml,
                optionsHtml
            );
        },
    });
}

$(".select_permission").on("change", actionSelect);
const actionCurrentNames = document.querySelector(".action_current_names");
const actionNames = document.querySelector(".action_names");
const actionNamesHidden = document.querySelector(".action_names_hidden");

function renderActionNames(
    actionCurrentNamesHtml,
    actionNamesHtml,
    optionsHtml
) {
    actionCurrentNames.value = actionCurrentNamesHtml;
    actionNames.value = actionNamesHtml;
    actionNamesHidden.innerHTML = optionsHtml;
}
