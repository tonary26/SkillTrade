<script setup>
import {useCategoriesStore} from "@/stores/categories.js"
import {useSkillsStore} from "@/stores/skills.js"
import {onMounted, reactive, computed, ref} from "vue"
import {useRouter} from "vue-router"

defineOptions({
  name: 'add'
})

const categoriesStore = useCategoriesStore()
const skillStore = useSkillsStore()

const maxLength = 500

const router = useRouter()

const form = reactive({
  title: '',
  description: '',
  category_id: '',
  type: ''
})

const types = [
  { title: 'Offer', value: 'offer' },
  { title: 'Request', value: 'request' }
]

const submitForm = async function () {
  await skillStore.addSkill(form)

  router.push({ name: 'skill.index' })
}

const symbolsLeft = computed(() => maxLength - form.description.length)
const isLow = computed(() => symbolsLeft.value <= 20)

onMounted(async () => {
  await categoriesStore.getCategories()
})

</script>

<template>
  <div class="auth-wrapper">
    <div class="main">
      <div class="form">
        <h1>ADD SKILL</h1>

        <div class="input-group">
          <label>Title</label>
          <input
              v-model="form.title"
              class="input"
              type="text"
              placeholder="Enter your skill title">
        </div>

        <div class="input-group">
          <label>Description</label>
          <textarea
              v-model="form.description"
              class="textarea-input"
              type="text"
              :maxLength="maxLength"
              placeholder="Enter your skill description (min 100)">
          </textarea>

          <span :class="['char-counter', { 'danger': isLow }]">
            {{ form.description.length }} / {{ maxLength }}
          </span>
        </div>

        <div class="input-group">
          <label>Category</label>
          <select v-model="form.category_id"
              class="category-select"
              name="category"
              id="category">
            <option value="" disabled>-- Select from the list --</option>
            <option v-for="category in categoriesStore.categories"
                    :key="category.id"
                    :value="category.id">
              {{ category.title }}
            </option>
          </select>
        </div>

        <div class="input-group">
          <label>Type</label>
          <select v-model="form.type"
              class="type-select"
              name="type"
              id="type">
            <option value="" disabled>-- Select from the list --</option>
            <option v-for="type in types"
                    :key="type.value"
                    :value="type.value">
              {{ type.title }}
            </option>
          </select>
        </div>

        <button @click="submitForm()"
            type="button"
            class="submit-btn">
          Create
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>

.auth-wrapper {
  min-height: 100vh;
  background-color: #f5f5f5;
  display: flex;
  justify-content: center;
  align-items: center;
}

.main {
  width: 100%;
  display: flex;
  justify-content: center;
}

h1 {
  color: white;
  letter-spacing: 4px;
  margin-bottom: 20px;
  font-size: 2rem;
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: #000000;
  width: 100%;
  max-width: 450px;
  padding: 60px 40px;
  border-radius: 40px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.input-group {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 25px;
}

.input-group label {
  color: #888;
  margin-bottom: 8px;
  font-size: 14px;
  margin-left: 10px;
}

.input,
.textarea-input {
  width: 100%;
  box-sizing: border-box;
  padding: 15px 20px;
  background: transparent;
  border: 1px solid #333;
  border-radius: 15px;
  color: white;
  font-size: 16px;
  transition: all 0.3s ease;
}

.textarea-input { resize: vertical; }

.input:focus,
.textarea-input:focus {
  outline: none;
  border-color: #ffffff;
  background: rgba(255, 255, 255, 0.05);
}

.char-counter {
  font-size: 12px;
  color: #666;
  margin-top: 8px;
  text-align: right;
  transition: color 0.3s ease;
}

.char-counter.danger {
  color: red;
}

.submit-btn {
  width: 100%;
  padding: 16px;
  margin-top: 20px;
  border-radius: 15px;
  border: none;
  background: white;
  color: black;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  transition: transform 0.2s, background 0.3s;
}

.submit-btn:hover {
  background: #e0e0e0;
  transform: translateY(-2px);
}

.submit-btn:active {
  transform: translateY(0);
}

.footer-text a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

.category-select {
  background-color: black;
  color: white;
  border: 1px solid #333;
  padding: 10px;
  border-radius: 15px;
}

.type-select {
  background-color: black;
  color: white;
  border: 1px solid #333;
  padding: 10px;
  border-radius: 15px;
}
</style>