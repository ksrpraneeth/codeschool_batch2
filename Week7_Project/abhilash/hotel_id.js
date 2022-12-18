
//   if (localStorage.getItem('user_data') == null) {
//     window.location.replace("login.html");
// }

// $("#logoutbutton").click(function () {
//     localStorage.removeItem('user_data');
//     window.location.replace("login.html");

// })
// $(document).ready(function () {
    
//     $('#next').click(function () {
//     $.ajax({
//         type: "GET",
//         url: "index.php",
//         dataType: 'JSON',
//         success: function (data) {
//             console.log(data)
//             if (data.status) {
//                 console.log(data)
//                 for (let i = 0; i < data.output.length; i++) {
//                     $('#hotels').append(`
//                        <a href="rooms.html?id=${data.output[i].hotel_type_id}" onclick="getHotel('${data.output[i].hotel_type_id}')"><img src="${data.output[i].hotels_images}"style="width:100%">
//                             <p>${data.output[i].name}<p>
                            
                    
//               `)

//                 }
//             }
//         }   
//     })
// })


// });

// $(document).ready(function () {
// function getHotel(hotelId){
//     console.log('abhi')
//     $.ajax({
//         type: "GET",
//         url: "booking.php?id=1",
//         // dataType: 'JSON',
//         data: {
//             'id': $('#hotels').val()
//         },
//         success: function (res, status, xhr) {
//             let response = JSON.parse(res);
//             if (response.status) {
//                 for (let i = 0; i < response.output.length; i++) {
//                     $('#available').append(`
//                    <img src="${response.output[i].hotels_images}"style="width:100%">
//                         <p>${response.output[i].hotel_name}<p>
//                             <p>${response.output[i].hotel_type}<p> 
//                                 <p>${response.output[i].available_rooms}<p>
//                                  <p>${response.output[i].room_type}<p>
//                                      <p>${response.output[i].price}<p>
                
//           `)

//                 }
//             }
//         }
//     })
// }
// });