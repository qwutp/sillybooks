// Основной JavaScript для SillyBooks
document.addEventListener("DOMContentLoaded", () => {
  // Инициализация всех компонентов
  initSearch()
  initImageUpload()
  initModals()
  initForms()
  initMobileMenu()
  initRating()

  // Поиск
  function initSearch() {
    const searchInput = document.querySelector(".search-input")
    if (searchInput) {
      let searchTimeout

      searchInput.addEventListener("input", function () {
        clearTimeout(searchTimeout)
        searchTimeout = setTimeout(() => {
          performSearch(this.value)
        }, 300)
      })
    }
  }

  function performSearch(query) {
    if (query.length < 2) return

    // Простой поиск по книгам
    const books = document.querySelectorAll(".book-card")
    books.forEach((book) => {
      const title = book.querySelector(".book-title")?.textContent.toLowerCase()
      const author = book.querySelector(".book-author")?.textContent.toLowerCase()

      if (title?.includes(query.toLowerCase()) || author?.includes(query.toLowerCase())) {
        book.style.display = "block"
      } else {
        book.style.display = "none"
      }
    })
  }

  // Загрузка изображений
  function initImageUpload() {
    const fileInputs = document.querySelectorAll('input[type="file"]')

    fileInputs.forEach((input) => {
      input.addEventListener("change", function () {
        const file = this.files[0]
        if (file) {
          const reader = new FileReader()
          reader.onload = (e) => {
            showImagePreview(input, e.target.result)
          }
          reader.readAsDataURL(file)
        }
      })
    })
  }

  function showImagePreview(input, src) {
    let preview = input.parentNode.querySelector(".image-preview")
    if (!preview) {
      preview = document.createElement("div")
      preview.className = "image-preview mt-2"
      input.parentNode.appendChild(preview)
    }

    preview.innerHTML = `
            <img src="${src}" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 0.5rem;">
        `
  }

  // Модальные окна
  function initModals() {
    // Открытие модальных окон
    document.addEventListener("click", (e) => {
      if (e.target.matches("[data-modal]")) {
        e.preventDefault()
        const modalId = e.target.getAttribute("data-modal")
        window.SillyBooks.openModal(modalId)
      }

      if (e.target.matches(".modal-close") || e.target.matches(".modal")) {
        window.SillyBooks.closeModal()
      }
    })

    // Закрытие по ESC
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        window.SillyBooks.closeModal()
      }
    })
  }

  // Формы
  function initForms() {
    const forms = document.querySelectorAll("form")

    forms.forEach((form) => {
      form.addEventListener("submit", function (e) {
        if (!validateForm(this)) {
          e.preventDefault()
        }
      })

      // Валидация в реальном времени
      const inputs = form.querySelectorAll(".form-control")
      inputs.forEach((input) => {
        input.addEventListener("blur", function () {
          validateField(this)
        })

        input.addEventListener("input", function () {
          clearFieldError(this)
        })
      })
    })
  }

  function validateForm(form) {
    let isValid = true
    const requiredFields = form.querySelectorAll("[required]")

    requiredFields.forEach((field) => {
      if (!validateField(field)) {
        isValid = false
      }
    })

    return isValid
  }

  function validateField(field) {
    const value = field.value.trim()
    let isValid = true
    let errorMessage = ""

    // Проверка обязательных полей
    if (field.hasAttribute("required") && !value) {
      isValid = false
      errorMessage = "Это поле обязательно для заполнения"
    }

    // Проверка email
    if (field.type === "email" && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      if (!emailRegex.test(value)) {
        isValid = false
        errorMessage = "Введите корректный email адрес"
      }
    }

    // Проверка пароля
    if (field.type === "password" && value && value.length < 6) {
      isValid = false
      errorMessage = "Пароль должен содержать минимум 6 символов"
    }

    // Подтверждение пароля
    if (field.name === "password_confirmation") {
      const passwordField = field.form.querySelector('[name="password"]')
      if (passwordField && value !== passwordField.value) {
        isValid = false
        errorMessage = "Пароли не совпадают"
      }
    }

    if (isValid) {
      clearFieldError(field)
    } else {
      showFieldError(field, errorMessage)
    }

    return isValid
  }

  function showFieldError(field, message) {
    field.classList.add("error")

    let errorElement = field.parentNode.querySelector(".error-message")
    if (!errorElement) {
      errorElement = document.createElement("div")
      errorElement.className = "error-message"
      field.parentNode.appendChild(errorElement)
    }

    errorElement.textContent = message
  }

  function clearFieldError(field) {
    field.classList.remove("error")
    const errorElement = field.parentNode.querySelector(".error-message")
    if (errorElement) {
      errorElement.remove()
    }
  }

  // Мобильное меню
  function initMobileMenu() {
    const menuToggle = document.querySelector(".menu-toggle")
    const sidebar = document.querySelector(".admin-sidebar")

    if (menuToggle && sidebar) {
      menuToggle.addEventListener("click", () => {
        sidebar.classList.toggle("open")
      })
    }
  }

  // Рейтинг звезд
  function initRating() {
    const ratingContainers = document.querySelectorAll(".rating-input")

    ratingContainers.forEach((container) => {
      const stars = container.querySelectorAll(".star")
      const input = container.querySelector('input[type="hidden"]')

      stars.forEach((star, index) => {
        star.addEventListener("click", () => {
          const rating = index + 1
          input.value = rating
          updateStars(stars, rating)
        })

        star.addEventListener("mouseenter", () => {
          updateStars(stars, index + 1)
        })
      })

      container.addEventListener("mouseleave", () => {
        updateStars(stars, input.value)
      })
    })
  }

  function updateStars(stars, rating) {
    stars.forEach((star, index) => {
      if (index < rating) {
        star.classList.remove("empty")
      } else {
        star.classList.add("empty")
      }
    })
  }

  // Подтверждение удаления
  document.addEventListener("click", (e) => {
    if (e.target.matches(".delete-btn") || e.target.closest(".delete-btn")) {
      if (!confirm("Вы уверены, что хотите удалить этот элемент?")) {
        e.preventDefault()
      }
    }
  })

  // Автоматическое скрытие алертов
  const alerts = document.querySelectorAll(".alert")
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.style.opacity = "0"
      setTimeout(() => {
        alert.remove()
      }, 300)
    }, 5000)
  })

  // Плавная прокрутка
  document.addEventListener("click", (e) => {
    if (e.target.matches('a[href^="#"]')) {
      e.preventDefault()
      const target = document.querySelector(e.target.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
        })
      }
    }
  })

  // Ленивая загрузка изображений
  const images = document.querySelectorAll("img[data-src]")
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target
        img.src = img.dataset.src
        img.removeAttribute("data-src")
        observer.unobserve(img)
      }
    })
  })

  images.forEach((img) => imageObserver.observe(img))
})

// Утилиты
function showLoading(element) {
  element.innerHTML = '<div class="loading"></div>'
}

function hideLoading(element, originalContent) {
  element.innerHTML = originalContent
}

function showNotification(message, type = "success") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type}`
  notification.textContent = message
  notification.style.position = "fixed"
  notification.style.top = "20px"
  notification.style.right = "20px"
  notification.style.zIndex = "9999"

  document.body.appendChild(notification)

  setTimeout(() => {
    notification.remove()
  }, 3000)
}

// Экспорт функций для глобального использования
window.SillyBooks = {
  showNotification,
  showLoading,
  hideLoading,
  openModal: (modalId) => {
    const modal = document.getElementById(modalId)
    if (modal) {
      modal.style.display = "flex"
      document.body.style.overflow = "hidden"
    }
  },
  closeModal: () => {
    const modals = document.querySelectorAll(".modal")
    modals.forEach((modal) => {
      modal.style.display = "none"
    })
    document.body.style.overflow = "auto"
  },
}
