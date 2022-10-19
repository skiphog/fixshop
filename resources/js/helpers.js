/**
 *
 * @param value
 * @returns {boolean}
 */
export function isInt (value) {
  let x;
  if (isNaN(value)) {
    return false;
  }
  x = parseFloat(value);

  return (x | 0) === x;
}
