public class XORCypher {
	public static void main(String args[]) {

		String plaintext = "a nice cup of milk tea";
		String key = "12345";
		String encrypted = xor_encrypt(plaintext, key);
		String decrypted = xor_decrypt(encrypted, key);
		System.out.println("Encrypted: " + encrypted);
		System.out.println("Decrypted: " + decrypted);
	}

	public static String xor_encrypt(String message, String key) {
		try {
			if (message == null || key == null)
				return null;

			char[] keys = key.toCharArray();
			char[] mesg = message.toCharArray();

			int ml = mesg.length;
			int kl = keys.length;
			char[] newmsg = new char[ml];

			for (int i = 0; i < ml; i++) {
				newmsg[i] = (char) (mesg[i] ^ keys[i % kl]);
			}
			mesg = null;
			keys = null;
			String temp = new String(newmsg);
			return Base64.encodeBytes(temp.getBytes());
		} catch (Exception e) {
			return null;
		}
	}

	public static String xor_decrypt(String message, String key) {
		try {
			if (message == null || key == null)
				return null;
			char[] keys = key.toCharArray();
			message = new String(Base64.decode(message));
			char[] mesg = message.toCharArray();

			int ml = mesg.length;
			int kl = keys.length;
			char[] newmsg = new char[ml];

			for (int i = 0; i < ml; i++) {
				newmsg[i] = (char) (mesg[i] ^ keys[i % kl]);
			}
			mesg = null;
			keys = null;
			return new String(newmsg);
		} catch (Exception e) {
			return null;
		}
	}
}