export const FormComponent = () => {
  return (
    <form action="./services/email/enviar.php" method="post">
      <input type="text" name="name" placeholder="nombre" />
      <button type="submit">Enviar</button>
    </form>
  )
}
