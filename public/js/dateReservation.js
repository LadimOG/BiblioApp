document.addEventListener("DOMContentLoaded", function () {
    const inputDate = this.getElementById("date");

    if (inputDate) {
        let today = new Date().toISOString().split("T");

        inputDate.min = today;
    }
});
