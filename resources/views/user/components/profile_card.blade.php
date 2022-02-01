<div class="column">
  {{ Form::hidden($id) }}

<div class="card" id={{ $id }} {{ isset($fixed) ? "fixed=".$fixed : "fixed=0" }} {{ isset($shifter_id) ? "shifter_id=".$shifter_id : "shifter_id=-1" }}>
    <div class="card-image">
      <figure class="image">
        <img src={{ $photoPath }} alt="Member's picture">
      </figure>
    </div>

    <div class="card-footer" style="padding: 8px">
      <p class="subtitle is-6 is-fullwidth" style="text-align: center">
        {{ $name }}
      </p>
    </div>
  </div>
</div>
