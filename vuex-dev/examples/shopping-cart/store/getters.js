export const cartProducts = state => {
  return state.cart.added.map(({ id, quantity }) => {
      //todo array.find(foo), 既对array中所有元素进行foo方法的匹配，并返回匹配的第一个值
    const product = state.products.all.find(p => p.id === id) //注意：这里WS认为.all是一个方法，其实all是product自己设置的属性

    return {
      title: product.title,
      price: product.price,
      quantity
    }
  })
}
