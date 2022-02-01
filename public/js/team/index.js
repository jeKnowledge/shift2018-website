$(document).ready(function () {
  let parent = $('#team_index_content')

  let onInvite = shifterId => {
    return new Promise(resolve => {
      $.get('/platform/team/invite?shifter_id=' + shifterId, res => {        
        resolve();
      })
    });
  }

  let onUninvite = shifterId => {
    return new Promise(resolve => {
      $.get('/platform/team/uninvite?shifter_id=' + shifterId, res => {
        resolve();
      })
    });
  }

  modalHandler(parent, onInvite, onUninvite)
})
