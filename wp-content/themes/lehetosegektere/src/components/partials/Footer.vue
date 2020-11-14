<template>
  <footer class="c-footer">
    <Section>
      <Button>Események</Button>
      <div>
        <div>Kövessetek bennünket!</div>
      </div>
      <Button>Hírlevél</Button>
    </Section>
  </footer>
</template>

<style lang="scss" scoped>
  .c-footer {
    display: block;
  }
</style>

<script>
import Section from './Layout/Section';

import Button from './Button';

export default {
  components: {
    Section,
    Button
  }
}
</script>
