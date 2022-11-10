/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/mapa.js ***!
  \******************************/
{
  var Temuco = [-38.737554, -72.597014];
  var map = L.map('map').setView(Temuco, 13);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 15,
    maxZoom: 19
  }).addTo(map);
  var San_Francisco = L.marker([-38.73698953650173, -72.60046095855009]).addTo(map);
  var San_Juan_Pablo_II = L.marker([-38.70286130369557, -72.54787296295298]).addTo(map);
  var Menchaca_Lira = L.marker([-38.73598005126031, -72.607542877025]).addTo(map);
  var Luis_Rivas = L.marker([-38.70024335914066, -72.54762561765075]).addTo(map);
  var Prensa_Institucional = L.marker([-38.735980097788875, -72.60466103640178]).addTo(map);
  var Mesa_Central = L.marker([-38.73534978620127, -72.60054100004236]).addTo(map);
  San_Francisco.bindPopup("\n      <h3>CAMPUS SAN FRANCISCO</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Manuel Montt 56</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 470</span>\n      <hr />\n\n      <h3>BIENESTAR ESTUDIANTIL</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Manuel Montt 56</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 424</span>\n      <hr />\n\n      <h3>AULA MAGNA</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Manuel Montt 56</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 471</span>\n      <hr />\n    ");
  San_Juan_Pablo_II.bindPopup("\n      <h3>CAMPUS SAN JUAN PABLO II</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Rudecindo Ortega 02950</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 553 978</span>\n      <hr />\n    ");
  Menchaca_Lira.bindPopup("\n      <h3>CAMPUS MENCHACA LIRA</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Avenida Alemania 0422</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 203 822</span>\n      <hr />\n    ");
  Luis_Rivas.bindPopup("\n      <h3>CAMPUS LUIS RIVAS DEL CANTO</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Callej\xF3n Las Mariposas s/n</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 596</span>\n      <hr />\n    ");
  Prensa_Institucional.bindPopup("\n      <h3>PRENSA INSTITUCIONAL</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Avenida Alemania 0211</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 428</span>\n      <hr />\n    ");
  Mesa_Central.bindPopup("\n      <h3>MESA CENTRAL</h3>\n      <span><i class=\"bi bi-geo-alt-fill\"></i> Prieto Norte 371</span>\n      <br />\n      <span><i class=\"bi bi-telephone-fill\"></i> Fono: +56 45 2 205 205</span>\n      <hr />\n    ");
}
/******/ })()
;