function getDate() {
    let dates = [];
    let date = new Date().toISOString().split('T')[0]; //2021-09-13
    let parts = date.split('-');
    let year = parts[0];
    let month = parts[1];
    let day = parts[2];

    return `${day}.${month}.${year}`;
}