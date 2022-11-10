{
    const Temuco = [-38.737554, -72.597014]

    var map = L.map('map').setView(Temuco, 13)

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      minZoom: 15,
      maxZoom: 19
    }).addTo(map)

    var San_Francisco = L.marker([-38.73698953650173, -72.60046095855009]).addTo(map)
    var San_Juan_Pablo_II = L.marker([-38.70286130369557, -72.54787296295298]).addTo(map)
    var Menchaca_Lira = L.marker([-38.73598005126031, -72.607542877025]).addTo(map)
    var Luis_Rivas = L.marker([-38.70024335914066, -72.54762561765075]).addTo(map)
    var Prensa_Institucional = L.marker([-38.735980097788875, -72.60466103640178]).addTo(map)
    var Mesa_Central = L.marker([-38.73534978620127, -72.60054100004236]).addTo(map)

    San_Francisco.bindPopup(`
      <h3>CAMPUS SAN FRANCISCO</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Manuel Montt 56</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 470</span>
      <hr />

      <h3>BIENESTAR ESTUDIANTIL</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Manuel Montt 56</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 424</span>
      <hr />

      <h3>AULA MAGNA</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Manuel Montt 56</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 471</span>
      <hr />
    `)

    San_Juan_Pablo_II.bindPopup(`
      <h3>CAMPUS SAN JUAN PABLO II</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Rudecindo Ortega 02950</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 553 978</span>
      <hr />
    `)
    
    Menchaca_Lira.bindPopup(`
      <h3>CAMPUS MENCHACA LIRA</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Avenida Alemania 0422</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 203 822</span>
      <hr />
    `)

    Luis_Rivas.bindPopup(`
      <h3>CAMPUS LUIS RIVAS DEL CANTO</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Callejón Las Mariposas s/n</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 596</span>
      <hr />
    `)

    Prensa_Institucional.bindPopup(`
      <h3>PRENSA INSTITUCIONAL</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Avenida Alemania 0211</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 428</span>
      <hr />
    `)

    Mesa_Central.bindPopup(`
      <h3>MESA CENTRAL</h3>
      <span><i class="bi bi-geo-alt-fill"></i> Prieto Norte 371</span>
      <br />
      <span><i class="bi bi-telephone-fill"></i> Fono: +56 45 2 205 205</span>
      <hr />
    `)
}