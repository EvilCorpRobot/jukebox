document.querySelectorAll(".icons-song").forEach((items) => {
    items.addEventListener("click", (e) => {
        document.location = "/song/remove/" + e.target.parentNode.parentNode.id
    })
})