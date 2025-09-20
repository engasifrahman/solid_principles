# 🏗 Liskov Substitution Principle (LSP)

## 📖 Definition
> Subtypes must be substitutable for their base types.  
> Objects of a superclass should be replaceable with objects of its subclasses without breaking the program.

---

## 🔴 Bad Example
- `PaymentMethod` superclass defines `buyNowPayLater()`.
- PayPal subclass **cannot implement BNPL**.
- Substituting PayPal where a `PaymentMethod` is expected **breaks the program**.
- ❌ Violates LSP.

---

## 🟢 Good Example
- We introduce a separate interface `IBuyNowPayLater`.
- Only Stripe implements BNPL.
- `PaymentProcessor` handles payments and BNPL via correct interfaces.
- ✅ LSP respected: each subclass only implements what it supports.

---

## 🎯 Benefits
- ✔️ Subclasses can safely replace superclass references.
- ✔️ Avoids runtime failures due to unsupported features.
- ✔️ Encourages interface segregation (related to ISP) for unsupported features.

---

## 🍬 Analogy
- Superclass = payment gateway that “supports all features”.  
- Subclass = gateway like PayPal that cannot do BNPL.  
- Passing PayPal as if it supported BNPL **breaks expectations** → LSP violation.
