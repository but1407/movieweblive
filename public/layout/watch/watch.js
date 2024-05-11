function incrementView() {
    const element = document.querySelector('.get_id_movie');
    const id = element.textContent;
    fetch(`/increment-view?id=${encodeURI(id)}`)
        .then(response => response.json())
        .then((res) => console.log(res))
        .catch(error => console.error('Error:', error));
}
setTimeout(incrementView, 60000);