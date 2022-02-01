window.onkeypress = function (event) {
  if (event.which == '13')
    event.preventDefault()
}

let defaultMessages = {
  'team_name': '<i onclick="edit_team_name()" style="margin-left:2%; font-size: 1rem" class="far fa-edit hover"></i>',
  'project_name': 'No project name.<br>Add one!',
  'project_repository': 'No project url.<br>Add one!',
  'project_description': 'No project description.<br>Add one!'
}

function updateRequest(type) {
  let form = $('#team_update')
  let oldData = new FormData(form.get(0));
  //for (let val of oldData.entries()) console.log('-> ', val);

  let data = new FormData()
  data.append('_token', oldData.get('_token'))
  data.append(type, oldData.get(type))
  //for (let val of data.entries()) console.log(':> ', val);

  return $.ajax({
    url: form.attr('action'),
    type: 'POST',
    data: data,
    cache: false,
    contentType: false,
    processData: false
  })  
}

function save(name, input, inputDiv, type) {
  $('.alert').empty()

  updateRequest(type).done(res => {
    //console.log(res)
    if (res.status == 'success') {
      let inputVal = input.val()
      
      if (inputVal != '') {
        if (type == 'team_name') {
          name.html(inputVal + defaultMessages[type])
        } else {
          name.text(inputVal)
        }
      } else {
        name.html(defaultMessages[type])
      }
      name.toggle()
      inputDiv.toggle()
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
}

function edit(name, input, inputDiv, useName = true) {
  name.toggle()
  inputDiv.toggle()
  
  let nameText = name.text()

  if (!useName)
    nameText = ''

  input.val(nameText)
}

function edit_team_name() {
  edit($("#team_name"), $("#team_name_input"), $("#team_name_input_div"))
}

function save_team_name() {
  save($("#team_name"), $("#team_name_input"), $("#team_name_input_div"), 'team_name')
}

function edit_project_name() {
  let projectName = $("#project_name")
  let useName = projectName.text() != 'No project name.Add one!'

  edit(projectName, $("#project_name_input"), $("#project_name_input_div"), useName)
}

function save_project_name() {
  save($("#project_name"), $("#project_name_input"), $("#project_name_input_div"), 'project_name')
}

function edit_project_repository() {
  let projectRepository = $("#project_repository")
  let useName = projectRepository.text() != 'No project url.Add one!'

  edit(projectRepository, $("#project_repository_input"), $("#project_repository_input_div"), useName)
}

function save_project_repository() {
  save($("#project_repository"), $("#project_repository_input"), $("#project_repository_input_div"), 'project_repository')
}

function edit_project_description() {
  let projectDescription = $('#project_description');
  let useName = projectDescription.text() != 'No project description.Add one!'
  edit(projectDescription, $("#project_description_input"), $("#project_description_input_div"), useName)
}

function save_project_description() {
  save($("#project_description"), $("#project_description_input"), $("#project_description_input_div"), 'project_description')
}

function save_team_logo(button) {
  $('.alert').empty()
  let teamLogo = $('#team_logo_image')
  let url = URL.createObjectURL(button.files[0])

  updateRequest('team_logo').done(res => {
    if (res.status == 'success') {
      teamLogo.attr('src', url)
    } else {
      console.log(res)
    }
  })
}