document.addEventListener("DOMContentLoaded", function() {
    var videoElement = document.getElementById("video");

    if (videoElement !== null) {
        videoElement.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

            if (input.files && input.files[0]) {
                if (ext === "mp4" || ext === "webm") {
                    displayVideo(input.files[0]);
                } else {
                    resetPreview();
                }
            }
        });
    }
});

function displayVideo(file) {
    var reader = new FileReader();
    reader.onload = function(e) {
        var videoPlayer = document.getElementById("videoPlayer");
        videoPlayer.style.display = "block";
        videoPlayer.innerHTML = '<source src="' + e.target.result + '" type="video/mp4">';
        videoPlayer.load();
        videoPlayer.play();

        var imageResult = document.getElementById("imageResult");
        imageResult.style.display = "none";
        imageResult.setAttribute("src", "");
    };
    reader.readAsDataURL(file);
}



function resetPreview() {
    var imageResult = document.getElementById("imageResult");
    imageResult.style.display = "none";
    imageResult.setAttribute("src", "");

    var videoPlayer = document.getElementById("videoPlayer");
    videoPlayer.style.display = "none";
    videoPlayer.innerHTML = "";
}