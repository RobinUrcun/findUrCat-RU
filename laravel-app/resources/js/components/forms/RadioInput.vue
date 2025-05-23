<template>
  <fieldset>
    <legend>Votre chat est il perdu ?</legend>
    <div>
      <input type="radio" name="is_lost" value="1" id="is_lost" />
      <label for="is_lost">Oui</label>
    </div>
    <div>
      <input type="radio" name="is_lost" value="0" id="isnt_lost" />
      <label for="isnt_lost">Non</label>
    </div>
  </fieldset>
</template>

<script>
export default {};
</script>