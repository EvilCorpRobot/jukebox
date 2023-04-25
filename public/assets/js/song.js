document.querySelector("#add_song").addEventListener("click", () => {
    let nameSong = document.querySelector("#name_text").value
    let fileSong = document.querySelector("#song_file")
    let fileImage = document.querySelector("#image_file")
    let typeSong = document.querySelector("#type_song").value
    let data = new FormData()
    data.append("name", nameSong)
    data.append("file_song", fileSong.files[0])
    data.append("file_image", fileImage.files[0])
    data.append('type', typeSong)
    fetch("/song/add", {
        method: "post",
        body: data
    })
})
