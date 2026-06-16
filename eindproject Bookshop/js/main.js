function updateOverview() {
    let form = document.getElementById("filterForm");
    let formData = new FormData(form);

    let zoekTitel = document.getElementById("zoek").value;
    let resultText = document.getElementById("zoekResult");
    if (resultText) {
        resultText.textContent = "Zoekresultaten voor: " + zoekTitel;
    }

    formData.append('zoek', zoekTitel);

    fetch('bookOverview.php', {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(htmlcontent => {
            document.getElementById("bookOverview").innerHTML = htmlcontent;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    fetch("auteurFilter.php", {
        method: "POST",
        body: formData

    })
        .then(res => res.text())
        .then(html => {
            document.getElementById("auteurFilters").innerHTML = html;
        });
}
window.onload = function () {
    updateOverview();
};
