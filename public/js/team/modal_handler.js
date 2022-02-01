function modalHandler (parent, onInvite = () => new Promise(resolve => resolve()), onUninvite = () => new Promise(resolve => resolve())) {
  let modal = parent.find('.modal')

  // Buttons
  parent.find('#open_modal_button').on('click', () => {
    searchShifters()
    modal.addClass('is-active')
  })

  parent.find('#close_modal_button').on('click', () => {
    modal.removeClass('is-active')
  })

  parent.find('#close_modal_background').on('click', () => {
    modal.removeClass('is-active')
  })

  // Modal elements
  let tbody = modal.find('tbody')

  let searchShiftersQuery = modal.find('#team_search_shifters_query')

  // Shifter cards
  let cards = [
    parent.find('#card0'),
    parent.find('#card1'),
    parent.find('#card2'),
    parent.find('#card3')
  ]

  // Modal data structures
  let invitedShifters = {}
  
  let i = 0;
  cards.forEach(card => {
    const shifterId = card.attr("shifter_id");
    if (shifterId != -1) {
      invitedShifters[shifterId] = i
    }
    ++i;
  });  

  // Shifter cards images
  let cardsImgs = cards.map(card => card.find('img'))

  // Shifter cards names
  let cardsNames = cards.map(card => card.find('p'))

  // Shifter cards available for invites
  let availableCards = (() => {    
    return cards.filter(card => card.attr('fixed') === '0')
      .map(card => cards.indexOf(card))
  })()    

  // On enter press, in searchShiftersQuery, search shifters
  searchShiftersQuery.on('keypress', ev => {
    if (ev.keyCode === 13) searchShifters()
  })

  // On button click, search shifters
  modal.find('#team_search_shifters_submit').on('click', () => searchShifters())

  // Handle shifters search, invite buttons and uninvite buttons
  function searchShifters () {
    let data = {
      _token: $('[name="_token"]').val(),
      name: searchShiftersQuery.val()
    }

    $.post('/platform/team/search/shifters', data, shifters => {
      // Clear previous search results
      tbody.empty()      
      
      console.log(shifters)

      // Create row for each resulted shifter found
      for (let shifter of shifters) {
        // Button has the id of the shifter
        let button = $('<a shifter_id=' + shifter.id + '></a>')

        // If the shifter has not been invited the displayed button is for
        // invite
        if (!invitedShifters.hasOwnProperty(String(shifter.id))) {
          button.text('Invite')
            .addClass('button is-black is-pulled-right w80p')
            .attr('button_type', 'invite')
            .attr('photo_path', shifter.photoPath)
            .attr('shifter_name', shifter.name)
        // If the shifter has been invited the displayed button is for uninvite
        } else {
          button.text('Uninvite')
            .addClass('button is-primary is-pulled-right w80p')
            .attr('button_type', 'uninvite')
            .attr('photo_path', shifter.photoPath)
            .attr('shifter_name', shifter.name)
        }

        // Display results in the modal
        tbody.append($('<tr></tr>')
          .append($('<td>' + shifter.name + '</td>'))
          .append($('<td></td>')
          .append(button))
        )
      }

      // When an invite button is pressed, it becomes an uninvite button and
      // runs the onInvite function
      $('[button_type="invite"]').on('click', function () {
        convertToUninviteButton($(this))
      })

      // If there are no available card slots we disable the invite buttons
      if (availableCards.length === 0) {
        modal.find('[button_type="invite"]')
          .attr('disabled', true)
          .off('click')
      }

      // When an uninvite button is pressed, it becomes an invite button and
      // runs the onUninvite function
      modal.find("[button_type='uninvite']").on('click', function () {
        convertToInviteButton($(this))
      })

      // Converts button to an invite button, frees shifter card occupied by the
      // selected shifter and runs onUninvite function
      function convertToInviteButton (button) {
        if (button.attr('button_type') == 'invite') return

        let shifterId = button.attr('shifter_id')

        button.removeClass('is-primary')
          .addClass('is-black')
          .text('Invite')
          .attr('button_type', 'invite')

        let cardId = invitedShifters[shifterId]

        availableCards.unshift(cardId)

        cardsImgs[cardId].attr(
          'src', '/images/shift18/platform/default_profile.png'
        )

        cardsNames[cardId].text('Empty Slot')

        delete invitedShifters[shifterId]

        parent.find('[name="card' + cardId + '"]')
          .removeAttr('value')

        onUninvite(shifterId).then(() => {
          button.off('click')

          modal.find('[button_type="invite"]')
            .attr('disabled', false)
            .on('click', function() { convertToUninviteButton($(this)) })
        })
      }

      function convertToUninviteButton (button) {
        if (button.attr('button_type') == 'uninvite') return

        let shifterId = button.attr('shifter_id')

        button.removeClass('is-black')
          .addClass('is-primary')
          .text('Uninvite')
          .attr('button_type', 'uninvite')

        let cardId = availableCards.shift()

        let photoPath = button.attr('photo_path')

        if (photoPath !== undefined) {
          cardsImgs[cardId][0].src = photoPath
        } else {
          cardsImgs[cardId].attr(
            'src', '/images/shift18/platform/default_profile.png'
          )
        }

        cardsNames[cardId].text(
          button.attr('shifter_name') + ' - Invited'
        )

        invitedShifters[shifterId] = cardId

        parent.find("[name='card" + cardId + "']")
          .val(shifterId)

        onInvite(shifterId).then(() => {          
          button.off('click')

          button.on('click', function() { convertToInviteButton($(this)) })

          if (availableCards.length === 0) {
            modal.find('[button_type="invite"]')
              .attr('disabled', true)
              .off('click')
          }
        })
      }
    })
  }
}
