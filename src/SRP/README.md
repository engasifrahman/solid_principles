

# 🍭 Single Responsibility Principle (SRP)

## 📖 Definition

> **“A class should have only one reason to change.”**
> Each class should focus on doing **one thing well** instead of mixing multiple jobs together.

---

## 🔴 Bad Example (All-in-One Class)

In the **bad design**, our `PaymentProcessor` is:

* Processing payments 💰
* Writing logs 📜
* Sending emails 📧

⚠️ Why is this bad?

* If logging rules change → we must edit `PaymentProcessor`.
* If email format changes → we must edit `PaymentProcessor`.
* If payment logic changes → we must edit `PaymentProcessor`.

➡️ **One class, many reasons to change → violates SRP.**

---

## 🟢 Good Example (Separation of Concerns)

In the **good design**, we split responsibilities:

* `PaymentProcessor` → only handles payment logic 💰
* `Logger` → only handles logging 📜
* `EmailNotifier` → only handles notifications 📧

Now:

* Change in email logic? → Only update `EmailNotifier`.
* Change in logging? → Only update `Logger`.
* Change in payment rules? → Only update `PaymentProcessor`.

➡️ **Each class has exactly one reason to change → follows SRP.**

---

## 🎯 Benefits of SRP

* ✔️ Easier to **maintain**
* ✔️ Easier to **test** (unit tests per responsibility)
* ✔️ Easier to **extend** without breaking unrelated code
* ✔️ Keeps classes **small, readable, and reusable**

---

## 🍬 Real-Life Analogy

Imagine a **restaurant worker**:

* A **chef** cooks food 👨‍🍳
* A **waiter** serves customers 🍽️
* A **cashier** handles payments 💵

If one person tries to do all three jobs, the system becomes messy and error-prone.
That’s what happens when you break SRP in code!

---
