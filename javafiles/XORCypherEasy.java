public class XORCypherEasy {
	private static String encryptDecrypt(String input) {
		String key = "16";
		StringBuilder output = new StringBuilder();
		for (int i = 0; i < input.length(); i++) {
			output.append((char) (input.charAt(i) ^ key.charAt(i % key.length())));
		}
		return output.toString();
	}

	public static void main(String[] args) {
		String encrypted = XORCypherEasy.encryptDecrypt("tejpratapsingh");
		System.out.println("Encrypted:" + encrypted);
		String decrypted = XORCypherEasy.encryptDecrypt(encrypted);
		System.out.println("Decrypted:" + decrypted);
	}
}