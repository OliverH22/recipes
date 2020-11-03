const init = () => {
    searchButton.onclick = (e) => {
        window.location = `./search.php?term=${encodeURIComponent(searchBar.value)}`;
    }
}

export {
    init
};
