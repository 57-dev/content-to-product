window.addEventListener('load', function () {

  const urlUpdate = window.location.href.split('&plugin')
  if (urlUpdate.length >= 2) {
    Swal.fire(
      'Thank you!',
      'Subscription done with success.',
      'success'
    ).then(() => {
      location.href = (urlUpdate[0])
    });


    // history.replaceState('', '', (urlUpdate[0]))
  }


  const scd_token = document.querySelector('#scd_token').value

  let subscription_buttons = document.querySelectorAll('.checkbox-subscription');
  for (const button of subscription_buttons) {
    button.addEventListener('click', function () {
      if (this.checked) {
        Swal.fire({
          html: '<h5>Do you want to subscribe to this module?</h5><small>You will be redirected to another page to complete the subscription.</small>',
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              html: '<i class="fa fa-spinner fa-spin fa-2x"></i>',
              showConfirmButton: false,
            })


            var http = new XMLHttpRequest();
            var url = '//admin.ventures-gajelabs.com/api/subscriptions';
            var params = 'website=' + window.location.hostname + '&module_id=' + this.dataset.id + '&cancel_url=' + (window.location.href).replaceAll('/', 'gajeslash').replaceAll('?', 'gajetag');
            http.open('POST', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.setRequestHeader('Authorization', 'Bearer ' + scd_token);

            http.onreadystatechange = function () {//Call a function when the state changes.
              if (http.readyState == 4 && http.status == 200) {
                location.href = JSON.parse(http.responseText).url;
              }
            }
            http.send(params);

          } else {
            this.checked = false
          }
        })
      } else {

        Swal.fire({
          html: '<h5>Do you really want to unsubscribe to this module?</h5><small>please contact us and let us know what prompts you to deactivate it thanks..</small>',
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              html: '<i class="fa fa-spinner fa-spin fa-2x"></i>',
              showConfirmButton: false,
            })
            var http = new XMLHttpRequest();
            var link = '//admin.ventures-gajelabs.com/api/unsubscription';
            var params = 'website=' + window.location.hostname + '&module_id=' + this.dataset.id;
            http.open('POST', link, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.setRequestHeader('Authorization', 'Bearer ' + scd_token);

            http.onreadystatechange = function () {//Call a function when the state changes.
              if (http.readyState == 4 && http.status == 200) {
                Swal.fire(
                  'Done!',
                  JSON.parse(http.responseText),
                  'success'
                ).then(() => {
                  setTimeout(() => {
                    location.href = window.location.href
                  }, 1000);
                });
              }
            }
            http.send(params);

          } else {
            this.checked = true
          }
        })
      }
    })
  }
})


