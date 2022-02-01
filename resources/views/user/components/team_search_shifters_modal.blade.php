<!-- Modal to invite shifters -->
<div class="modal">
  <div class="modal-background" id="close_modal_background"></div>

  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">
        <strong>Invite Shifters</strong>
      </p>

      <div class="field has-addons is-pulled-right">
        <div class="control">
          <input class="input" type="text" placeholder="Search by username"
            id="team_search_shifters_query">
        </div>

        <div class="control">
          <a class="button is-black w80px" style="margin-right: 10px"
            id="team_search_shifters_submit">
            Search
          </a>
        </div>
      </div>
    </header>

    <section class="modal-card-body">
      <table class="table is-fullwidth is-hoverable">
        <thead>
          <tr>
            <th>Shifters available</th>
            <td></td>
          </tr>
        </thead>

        <tbody></tbody>
      </table>
    </section>

    <footer class="modal-card-foot">
      <a class="button is-danger w80px" id="close_modal_button">Close</a>
    </footer>
  </div>
</div>
