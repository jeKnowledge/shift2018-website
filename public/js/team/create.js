$(document).ready(function () {
  let parent = $('#team_create_content')

  modalHandler(parent)

  let teamLogo = parent.find('#team_logo_image')

  // Update team logo image on file selection
  parent.find('#team_logo').change(function () {
    let url = URL.createObjectURL(this.files[0])

    teamLogo.attr('src', url)
  })

  // Prevent form submition when enter is pressed
  $(document).on('keypress', ev => {
    if (ev.keyCode === 13) ev.preventDefault()
  })

  // Forms
  $('#team_create_content').submit(function (ev) {
    ev.preventDefault()

    $('.alert').empty()

    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: new FormData(this),
      cache: false,
      contentType: false,
      processData: false
    })
    .done(res => {
      // Redirect to /platform/user
      if (res.status === 'success') {
        window.location = '/platform/user?success=team_create'
      } else {
        delete res['status']

        // Get errors
        for (let key of Object.keys(res)) {
          let error = $('<div class="error"></div>').text(res[key][0])

          // Display errors
          $('#' + key + '_alert').append(error)
        }
      }
    })
  })
})
