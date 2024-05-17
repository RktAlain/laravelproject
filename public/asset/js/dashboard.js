// Données de test pour le graphique à barres
var barData = {
    labels: ["Impression", "Scan", "Reliure", "Plastification"],
    datasets: [{
        label: 'Ventes',
        data: [totalImpression, totalScan, totalReliure, totalPlastification],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};

// Options pour le graphique à barres
var barOptions = {};

// Créer le graphique à barres
var barChartCanvas = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(barChartCanvas, {
    type: 'bar',
    data: barData,
    options: barOptions
});

// Données de test pour le graphique circulaire (pie chart)
// var pieData = {
//     labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//     datasets: [{
//         data: [12, 19, 3, 5, 2, 3],
//         backgroundColor: [
//             'rgba(255, 99, 132, 0.2)',
//             'rgba(54, 162, 235, 0.2)',
//             'rgba(255, 206, 86, 0.2)',
//             'rgba(75, 192, 192, 0.2)',
//             'rgba(153, 102, 255, 0.2)',
//             'rgba(255, 159, 64, 0.2)'
//         ],
//         borderColor: [
//             'rgba(255, 99, 132, 1)',
//             'rgba(54, 162, 235, 1)',
//             'rgba(255, 206, 86, 1)',
//             'rgba(75, 192, 192, 1)',
//             'rgba(153, 102, 255, 1)',
//             'rgba(255, 159, 64, 1)'
//         ],
//         borderWidth: 1
//     }]
// };

// Options pour le graphique circulaire (pie chart)
// var pieOptions = {
//     responsive: true,
//     maintainAspectRatio: false
// };

// Créer le graphique circulaire (pie chart)
// var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
// var pieChart = new Chart(pieChartCanvas, {
//     type: 'pie',
//     data: pieData,
//     options: pieOptions
// });
