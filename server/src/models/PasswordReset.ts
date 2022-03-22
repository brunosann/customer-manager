import { Model, DataTypes } from "sequelize";
import { sequelize } from "../instances/mysql";

interface PasswordResetInstance extends Model {
  email: string;
  code: string;
  isUsed: boolean;
  expireIn: Date;
}

export const PasswordReset = sequelize.define<PasswordResetInstance>(
  "PasswordReset",
  {
    id: {
      primaryKey: true,
      autoIncrement: true,
      type: DataTypes.INTEGER,
    },
    email: {
      type: DataTypes.STRING,
      unique: true,
    },
    code: {
      type: DataTypes.STRING,
    },
    isUsed: {
      type: DataTypes.TINYINT,
    },
    expireIn: {
      type: DataTypes.DATE,
    },
  },
  {
    tableName: "password_resets",
    timestamps: false,
  }
);
