var req = new XMLHttpRequest();
function updatePoin() {

    req.open('POST', '../Ajax/ayo_donasi/ayo_donasi_4/update_poin.php', true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {
            alert('Horeee.. Anda mendapatkan 20 Poin..');
            document.location.href = '../home.php';
        }
    }
    req.send();
}
// function updatePoin() {

//     req.open('POST', '../Ajax/ayo_donasi/ayo_donasi_4/update_bukti.php', true);
//     req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     req.onreadystatechange = function() {
//         if (req.readyState == 4 && req.status == 200) {
//             alert('Horeee.. Anda mendapatkan 20 Poin..');
//             document.location.href = '../home.php';
//         }
//     }
//     var bukti = document.getElementById('bukti').value;
//     let sendData = JSON.stringify({
//         'bukti' : bukti
//     })
//     req.send(sendData);
// }