function obrisi(id){
    req = $.ajax({
        url: 'handler/delete.php',
        type: 'post',
        data: { 'id': id }
    });

    req.done(function (res, textStatus, jqXHR) {
        if (res == "Success") {
            location.reload(true);
            alert('Uspesno obrisano iz baze!');
            
        } else {
            console.log("neuspesno brisanje " + res);
            alert("neuspesno brisanje ");

        }
         
    });



}


//za dodaj novu rezervaciju modal
//
$('#rezervisi').submit(function () {
  
    event.preventDefault(); //zaustavi refresovanje na stranici
   
    const $form = $(this);//this se odnosi na formu #rezervisi
    const $input = $form.find('input,select,button,textarea');
    const serijalizacija = $form.serialize(); //serijalizujemo podatke iz forme i saljemo ih nasem postu

    
  
    $input.prop('disabled', true); //na sve inpute postavljamo property da onemogucimo da korisnik menja ono sto je uneo dok se ne zavrsi ubacivanje u tabelu


    request = $.ajax({  
        url: 'handler/add.php',  
        type: 'post',
        data: serijalizacija
    });

    request.done(function (response, textStatus, jqXHR) {
       
        if (response === "Success") {
            alert("Uspesno rezervisano");
            console.log("Uspesno rezervisano");
            location.reload(true);
        }
        else {
       
            console.log("Rezervacija nije dodata" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
});

//kada hocemo neki vec postojeci termin da editujemo, kada korisnik klikne na glavno dugme
//treba da se otvori modal koji ce biti popunjen podacima koji se nalaze u tabeli 
function azuriraj1(id) {
   
     
    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: { 'id': id },
        dataType: 'json'
    });


    request.done(function (response, textStatus, jqXHR) {
 


       $('#terminZaIzmenu').val(response[0]["idTe"]); //skriveno polje 
 
        
       
       $('#kozmeticariE').val(response[0]["zaposleni"]);
        console.log(response[0]["zaposleni"]);

       $('#tretmaniE').val(response[0]["idTr"]);
 

        $('#datumE').val(response[0]['datumVreme'].trim());   
 
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });

};

//sada kada korisnik unese neke izmene hocemo da klikom na dugme potvrdi te izmene zaista unesemo u bazu
$('#promeniTermin').submit(function () { //kada korisnik klikne dugme unutar modala
        
    event.preventDefault();

    const $form =  $(this);
   
    const $inputs = $form.find('input, select, button, textarea');
    
    const serializedData = $form.serialize();
   
    $inputs.prop('disabled', true);

  
    request = $.ajax({
        url: 'handler/edit.php',
        type: 'post',
        data: serializedData
    })

    request.done(function (response, textStatus, jqXHR) {
        console.log(response);
       
        $('#editModal').modal('hide');
        location.reload(true);
        $('#promeniTermin').reset;

    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });
});



//pretrazivanje tretmana po nazivu ili opisu tretmana 
$(document).ready(function() {
    $("#searchbar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#teloTabele tr").filter(function() {
            $(this).toggle($(this).text()
            .toLowerCase().indexOf(value) > -1)
        });
      
    });
});

//funkcija za soritranje tretmana po ceni 
function sortirajPoCeni() {
    
    var tbody =$('#teloTabele');

    tbody.find('tr').sort(function(a, b)  {
        console.log(a);
        if($('#poredak').val()=='asc') 
        {
            return $('td:last', a).text().localeCompare($('td:last', b).text());
        } else  {
            return $('td:last', b).text().localeCompare($('td:last', a).text());
        }

    }).appendTo(tbody);
	
    var sort_order=$('#poredak').val();
    if(sort_order=="asc")  { //ako smo malopre sortirali rastuce
        document.getElementById("poredak").value="desc"; //sledeci put treba da soritiramo opadajuce
    }
    if(sort_order=="desc") {
        document.getElementById("poredak").value="asc";
    }
}
