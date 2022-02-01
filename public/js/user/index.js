$(document).ready(() => {
  // Content of each tab
  let userindexContent = $('#user_index_content')

  let userEditContent = $('#user_edit_content').addClass('invisible')

  let userChangePasswordContent = $('#user_change_password_content')

  userChangePasswordContent.addClass('invisible')

  let teamCreateContent = $('#team_create_content').addClass('invisible')

  let teamIndexContent = $('#team_index_content').addClass('invisible')

  let teamJoin = $('#team_join_content').addClass('invisible')

  // List of all tabs content
  let content = {
    'user_index_content': userindexContent,
    'user_edit_content': userEditContent,
    'user_change_password_content': userChangePasswordContent,
    'team_create_content': teamCreateContent,
    'team_index_content': teamIndexContent,
    'team_join_content': teamJoin
  }

  // Currently active tab content
  let activeContent = 'user_index_content'

  // Change tab, display content of new tab, hide content of old tab
  let changeContent = (toActivate) => {
    content[activeContent].addClass('invisible')

    content[toActivate].removeClass('invisible')

    activeContent = content[toActivate].attr('id')

    $('.alert').empty()

    $('.alert.success').remove()
  }

  // Tabs
  $('#user_index_tab').click(() => changeContent('user_index_content'))

  $('#team_create_tab').click(() => changeContent('team_create_content'))

  $('#team_index_tab').click(() => changeContent('team_index_content'))

  $('#team_join_tab').click(() => changeContent('team_join_content'))

  // Buttons
  $('#user_edit_button').click(() => changeContent('user_edit_content'))

  $('#user_change_password_button').click(() => {
    changeContent('user_change_password_content')
  })

$('#photoFile').change(function () {
  let url = URL.createObjectURL(this.files[0])

  $('#photoFileImage').attr('src', url)
})

  // Forms
  $('#user_edit_content').submit(function (ev) {
    ev.preventDefault()

    $('.alert').empty()

    let data = new FormData(this);
    let params = {
      url: $(this).attr('action'),
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST'
    }

    $.ajax(params).done(res => {
      // Redirect to /platform/user
      if (res.status === 'success') {
        window.location = '/platform/user?success=user_edit'
      } else {
        delete res['status']

        // Get errors
        for (let key of Object.keys(res)) {
          let error = $('<div class="error"></div>').text(res[key][0])

          // Display errors          
          $('#user_' + key + '_alert').append(error)
        }
      }
    })
  })

  $('#user_change_password_content').submit(function (ev) {
    ev.preventDefault()

    $('.alert').empty()

    let data = $(this).serializeArray()

    // If all fields are set
    if (data[2].value && data[3].value && data[4].value) {
      $.post($(this).attr('action'), $(this).serialize(), res => {
        // Redirect to /platform/user
        if (res.status === 'success') {
          window.location = '/platform/user?success=change_password'
        } else {
          delete res['status']

          // Get errors
          for (let key of Object.keys(res)) {
            let errorsList = $('<lu></lu>')

            for (let error of res[key]) {
              errorsList.append(
                $('<li></li>').text(error)
              )
            }

            // Display errors
            $('#user_' + key + '_alert').append(errorsList)
          }
        }
      })
    // If at least one of the fields is not set
    } else {
      // Old password not set
      if (!data[2].value) {
        $('#user_' + data[2].name + '_alert').append(
          $('<li>Must be set</li>')
        )
      }

      // New password not set
      if (!data[3].value) {
        $('#user_' + data[3].name + '_alert').append(
          $('<li>Must be set</li>')
        )
      }

      // New password confirmation not set
      if (!data[4].value) {
        $('#user_' + data[4].name + '_alert').append(
          $('<li>Must be set</li>')
        )
      }
    }
  })
})
