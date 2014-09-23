class User < ActiveRecord::Base

	EMAIL_REGEX = 
	validates :name, presence: true,
					 length: { in: 2..40 }	
	validates :email, presence: true, 
					 length: { in: 3..60 },
					 format: { with: EMAIL_REGEX },
					 uniqueness: { case_sensitive: false }
	validates :age, presence: true,
					numericality: true
	validates :password, presence: true,
					length: { in: 6..10 }

	before_save { self.email.downcase! }

	has_secure_password
end
